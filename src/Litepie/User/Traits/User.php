<?php
namespace Litepie\User\Traits;

/**
 * Trait HasPermission.
 */
trait User
{
    /**
     * User morph to many relation.
     */
    public function user()
    {
        return $this->morphTo();
    }

    /**
     * Returns the profile picture of the user.
     *
     * @return string image path
     */
    public function getPictureAttribute($value)
    {
        if (!empty($this->photo)) {

            return trans_url($this->defaultImage('photo'));
        }

        if ($this->sex == 'female') {
            return theme_asset('img/avatar/female.png');
        }

        return theme_asset('img/avatar/male.png');
    }

    /**
     * Returns the badge picture of the user.
     *
     * @return string image path
     */
    public function getBadgeAttribute($value)
    {
        return "<a href='" . trans_url("user/".$this->slug) . "' ><img alt=' width='45' height='45' src='{$this->picture}' title='{$this->name}' class='img-circle'></a>";

    }

    /**
     * Returns the joined date of the user.
     *
     * @return string date
     */
    public function getJoinedAttribute()
    {
        return $this->created_at->format(config('cms.format.date'));
    }

    /**
     * Returns the whrether auser is active or not.
     *
     * @return string date
     */
    public function getIsActiveAttribute()
    {
        return $this->status == 'Active';
    }

    /**
     * Returns the whrether auser is active or not.
     *
     * @return string date
     */
    public function getIsNewAttribute()
    {
        return $this->status == 'New';
    }

    /**
     * Returns the whrether auser is active or not.
     *
     * @return string date
     */
    public function getIsLockedAttribute()
    {
        return $this->status != 'New' && $this->status != 'Active';
    }


}
