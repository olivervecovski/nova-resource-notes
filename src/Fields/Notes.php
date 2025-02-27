<?php

namespace DigitalCloud\NovaResourceNotes\Fields;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\ResourceRelationshipGuesser;
use DigitalCloud\NovaResourceNotes\Resources\Note;

class Notes extends Field {

    public $onlyOnDetail = true;
    public $showOnUpdate = false;
    public $showOnCreation = false;

    public $component = 'notes-field';

    public $resourceName;
    public $resourceClass;
    public $hasManyRelationship;

    public function __construct($name, $attribute = null)
    {
        parent::__construct($name, $attribute);

        $resource = Note::class;

        $this->resourceClass = $resource;
        $this->resourceName = $resource::uriKey();
        $this->hasManyRelationship = $this->attribute;
    }

    public function meta()
    {
        return array_merge([
            'resourceName' => $this->resourceName,
            'hasManyRelationship' => $this->hasManyRelationship,
            'listable' => true,
            'singularLabel' => $this->singularLabel ?? Str::singular($this->name),
        ], $this->meta);
    }

    /**
     * Get the relationship name.
     *
     * @return string
     */
    public function relationshipName()
    {

    }

    /**
     * Get the relationship type.
     *
     * @return string
     */
    public function relationshipType()
    {
        
    }

}
