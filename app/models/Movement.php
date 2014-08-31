<?php

class Movement extends Eloquent {

    protected $guarded = array('dir');
	protected $hidden = array('dir');

	public static $rules = array();

    protected $appends = array('images');

	public function process()
    {
        return $this->belongsTo('Process');
    }
	public function action()
    {
        return $this->belongsTo('Action', 'action_type');
    }
	public function notification()
    {
        return $this->belongsTo('NotificationType', 'notification_type');
    }

    public function getImagesAttribute()
    {
        $files = File::files($this->getImagesPath());
        usort($files, function($a, $b) {
            return filemtime($a) - filemtime($b);
        });
        $files = array_map(function($file) {
            return asset($file);
        }, $files);

        // dd($files);
        return $files;
    }


    public function getImagesPath()
    {
        return 'movements/'. $this->dir;
    }

}
