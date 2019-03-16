<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createTbl extends Model
{
    public function create_miss_tbl($ucountry){ 
        if (!Schema::hasTable($ucountry.'_miss_tbl')){
            Schema::create($ucountry.'_miss_tbl', function($table)
            {
                
                $table->increments('id');
                $table->string('uname');
                $table->integer('user_id');
                $table->string('city');
                
                
                $table->string('tel');
                $table->string('type');
                $table->text('addr1');
                $table->string('img0');
                $table->string('img1');
                $table->string('img2');
                $table->string('img3');
                $table->string('img4');
                $table->string('img5');
                $table->string('img6');
                $table->string('img7');
                $table->string('img8');
                $table->string('img9');
                $table->text('addr2');
                $table->text('intro');
                $table->string('status');
                $table->timestamps();
                
            });
        }
        
    }

    public function create_ptmiss_tbl($ucountry){ 
        if (!Schema::hasTable($ucountry.'_ptmiss_tbl')){
            Schema::create($ucountry.'_ptmiss_tbl', function($table)
            {
                
                $table->increments('id');
                $table->string('ptname');
                $table->integer('user_id');
                $table->string('tel');
                $table->string('city');
                $table->string('img');
                $table->text('subject');
                $table->text('info');
                $table->text('period');
                $table->timestamps();
                
            });
        }
        
    }
    public function create_mass_tbl($ucountry){ 
        if (!Schema::hasTable($ucountry.'_massage_tbl')){
            Schema::create($ucountry.'_massage_tbl', function($table)
            {
                
                $table->increments('id');
                $table->string('type');
                
                $table->string('name');
                $table->text('addr1');
                $table->string('img_name');
                $table->string('img1');
                $table->string('img2');
                $table->string('img3');
                $table->string('img4');
                $table->string('img5');
                $table->string('img6');
                $table->string('img7');
                $table->string('img8');
                $table->string('img9');
                $table->text('addr2');
                $table->text('');
                
                $table->string('status');
                $table->date('expire_at');
                $table->timestamps();
                $table->integer('user_id');
            });
        }
        
    }
    
}


