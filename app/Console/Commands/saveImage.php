<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class saveImage extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'command:name';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  private $image;
  private $dirName;
  private $photoName;
  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct($image,$dirName,$photoName)
  {
    parent::__construct();
    $this->image=$image;
    $this->dirName=$dirName;
    $this->photoName=$photoName;
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $image=$this->image;
    $dirName=$this->dirName;
    $photoName=$this->photoName;
    $height = $image->height();
    $width = $image->width();
    $ratio = $width / $height;
    if(!File::exists($dirName.'thumbnail')){
      File::makeDirectory($dirName.'thumbnail', 0775, true, true);
    }
    if(!File::exists($dirName.'small')){
      File::makeDirectory($dirName.'small', 0775, true, true);
    }
    if(!File::exists($dirName.'medium')){
      File::makeDirectory($dirName.'medium', 0775, true, true);
    }
    if(!File::exists($dirName.'large')){
      File::makeDirectory($dirName.'large', 0775, true, true);
    }
    if ($ratio < 1) {
      $image->resize(200, 200)->save($dirName . 'thumbnail/' . $photoName);
      $image->resize(400, 400 / $ratio)->save($dirName . 'small/' . $photoName);
      $image->resize(800, 800 / $ratio)->save($dirName . 'medium/' . $photoName);
      $image->resize(1600, 1600 / $ratio)->save($dirName . 'large/' . $photoName);
    } else {
      $image->resize(200, 200)->save($dirName . 'thumbnail/' . $photoName);
      $image->resize(400 * $ratio, 400)->save($dirName . 'small/' . $photoName);
      $image->resize(800 * $ratio, 800)->save($dirName . 'medium/' . $photoName);
      $image->resize(1600 * $ratio, 1600)->save($dirName . 'large/' . $photoName);
    }
  }
}
