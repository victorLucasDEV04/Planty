<?php

namespace FluentForm\App\Api;

use FluentForm\App\Helpers\Helper;
use FluentForm\App\Modules\Form\FormFieldsParser;

class FormProperties
{
    private $form;

    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
     * Get Form formatted inputs
     *
     * @param string[] $with
     *
     * @return array
     */
    public function inputs($with = ['admin_label', 'raw'])
    {
        return FormFieldsParser::getEntryInputs($this->form, $with);
    }

    /**
     * Get Form Input labels
     *
     * @return array
     */
    public function labels()
    {
        $inputs = $this->inputs();
        return FormFieldsParser::getAdminLabels($this->form, $inputs);
    }

    /**
     * Get Form Fields
     *
     * @return array
     */
    public function fields()
    {
        return json_decode($this->form->form_fields, true);
    }

    /**
     * Get Form Settings
     *
     * @return array
     */
    public function settings()
    {
        return (array) Helper::getFormMeta($this->form->id, 'formSettings', []);
    }

    /**
     * Get Email Notifications as an array
     *
     * @return array
     */
    public function emailNotifications()
    {
        $emailNotifications = wpFluent()
            ->table('fluentform_form_meta')
            ->where('form_id', $this->form->id)
            ->where('meta_key', 'notifications')
            ->get();

        $formattedNotifications = [];

        foreach ($emailNotifications as $notification) {
            $value = \json_decode($notification->value, true);
            $formattedNotifications[] = [
                'id'       => $notification->id,
                'settings' => $value,
            ];
        }

        return $formattedNotifications;
    }

    /**
     * Get Form metas
     *
     * @param $metaName
     * @param false $default
     *
     * @return mixed|string
     */
    public function meta($metaName, $default = false)
    {
        return Helper::getFormMeta($this->form->id, $metaName, $default);
    }

    /**
     * Get form renerable pass settings as an array
     *
     * @return array
     */
    public function renderable()
    {
        $isRenderable = apply_filters_deprecated(
            'fluentform_is_form_renderable',
            [
                [
                    'status'  => true,
                    'message' => '',
                ],
                $this->form
            ],
            FLUENTFORM_FRAMEWORK_UPGRADE,
            'fluentform/is_form_renderable',
            'Use fluentform/is_form_renderable instead of fluentform_is_form_renderable.'
        );

        return apply_filters('fluentform/is_form_renderable', $isRenderable, $this->form);
    }

    public function conversionRate()
    {
        if (!$this->form->total_Submissions) {
            return 0;
        }

        if (!$this->form->total_views) {
            return 0;
        }

        return ceil(($this->form->total_Submissions / $this->form->total_views) * 100);
    }

    public function submissionCount()
    {
        return wpFluent()
            ->table('fluentform_submissions')
            ->where('form_id', $this->form->id)
            ->where('status', '!=', 'trashed')
            ->count();
    }

    public function viewCount()
    {
        $hasCount = wpFluent()
            ->table('fluentform_form_meta')
            ->where('meta_key', '_total_views')
            ->where('form_id', $this->form->id)
            ->first();

        if ($hasCount) {
            return intval($hasCount->value);
        }

        return 0;
    }

    public function unreadCount()
    {
        return wpFluent()->table('fluentform_submissions')
            ->where('status', 'unread')
            ->where('form_id', $this->form->id)
            ->count();
    }

    public function __get($name)
    {
        if (property_exists($this->form, $name)) {
            return $this->form->{$name};
        }

        return false;
    }
}
