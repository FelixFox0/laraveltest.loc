<?php 
    namespace App\Providers;
    use App\Urlfile;
    use Illuminate\Validation\Validator;

    class UrlfileValidator extends Validator {
        public function validateUrlfile ($attribute, $value, $parameters)
        {
            
            $file = @file_get_contents($value)
                    or ($file = false);
            if($file){
                return true;
            }else{
                return false;
            }
          
        
    }
}