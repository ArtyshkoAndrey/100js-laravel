<?php

namespace App;

trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    |
    | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
    | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
    | template dropdown.
    |
    | Any fields defined here will show up after the standard page fields:
    | - select template
    | - page name (only seen by admins)
    | - page title
    | - page slug
    */

    private function home()
    {
        $this->crud->addField([   // CustomHTML
                        'name' => 'metas_separator',
                        'type' => 'custom_html',
                        'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
                    ]);
        $this->crud->addField([
                        'name' => 'meta_title',
                        'label' => trans('backpack::pagemanager.meta_title'),
                        'fake' => true,
                        'store_in' => 'extras',
                    ]);
        $this->crud->addField([
                        'name' => 'meta_description',
                        'label' => trans('backpack::pagemanager.meta_description'),
                        'fake' => true,
                        'store_in' => 'extras',
                    ]);
        $this->crud->addField([
                        'name' => 'meta_keywords',
                        'type' => 'textarea',
                        'label' => trans('backpack::pagemanager.meta_keywords'),
                        'fake' => true,
                        'store_in' => 'extras',
                    ]);
        $this->crud->addField([   // CustomHTML
                        'name' => 'content_separator',
                        'type' => 'custom_html',
                        'value' => '<br><h2>'.trans('backpack::pagemanager.content').'</h2><hr>',
                    ]);
        $this->crud->addField([
                        'name' => 'content_title',
                        'label' => 'Content Title',
                        'type' => 'ckeditor',
                        'placeholder' => 'Your textarea text here',
                        'fake' => true,
                        'store_in' => 'content',
                    ]);
        $this->crud->addField([
                        'name' => 'by',
                        'label' => 'By',
                        'type' => 'textarea',
                        'placeholder' => 'Your textarea text here',
                        'fake' => true,
                        'store_in' => 'content',
                    ]);
        $this->crud->addField([
                        'name' => 'by_link',
                        'label' => 'By Link',
                        'type' => 'textarea',
                        'placeholder' => 'Your textarea text here',
                        'fake' => true,
                        'store_in' => 'content',
                    ]);
    }

    private function days()
    {
        $this->crud->addField([   // CustomHTML
                        'name' => 'metas_separator',
                        'type' => 'custom_html',
                        'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
                    ]);
        $this->crud->addField([
                        'name' => 'meta_title',
                        'label' => trans('backpack::pagemanager.meta_title'),
                        'fake' => true,
                        'store_in' => 'extras',
                    ]);
        $this->crud->addField([
                        'name' => 'meta_description',
                        'label' => trans('backpack::pagemanager.meta_description'),
                        'fake' => true,
                        'store_in' => 'extras',
                    ]);
        $this->crud->addField([
                        'name' => 'meta_keywords',
                        'type' => 'textarea',
                        'label' => trans('backpack::pagemanager.meta_keywords'),
                        'fake' => true,
                        'store_in' => 'extras',
                    ]);
        $this->crud->addField([   // CustomHTML
                        'name' => 'content_separator',
                        'type' => 'custom_html',
                        'value' => '<br><h2>'.trans('backpack::pagemanager.content').'</h2><hr>',
                    ]);
         $this->crud->addField([
                        'name' => 'content_title',
                        'type' => 'textarea',
                        'label' => 'Content Title',
                        'fake' => true,
                        'store_in' => 'extras',
                    ]);
        $this->crud->addField([
                        'name' => 'content',
                        'label' => 'Content',
                        'type' => 'ckeditor',
                        'placeholder' => 'Your textarea text here'
                    ]);
    }
}
