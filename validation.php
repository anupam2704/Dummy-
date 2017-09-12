<?php
class validate
{
        public function validate_age($age)
        {
                $age=rtrim($age);
                if(ctype_digit($age))
                {
                        if(!($age>0 && $age<76))
                                $msg=1;
                        else
                            $msg=0;

                }
                if(!(ctype_digit($age)))
                {
                        if(preg_match('/\s/',$age))
                                $msg=3;
                        else
                                $msg=2;
                }
                return $msg;

        }

        public function validate_phone($phone)
        {
                $phone=rtrim($phone);
                $length=strlen($phone);
                if(ctype_digit($phone))
                {
                        if(!($length==10))
                            $msg=1;
                        else
                            $msg=0;
                }
                if(!(ctype_digit($phone)))
                {
                        if(preg_match('/\s/',$phone))
                                $msg=3;
                        else
                                $msg=2;
                }
                return $msg;
        }
         public function validate_name($name)
        {
                if(!ctype_alpha(str_replace(' ', '', $name)))
                        $msg=1;
                else
                        $msg=0;
                return $msg;

        }

        public function validate_city($city)
        {
                if(!ctype_alpha($city))
                        $msg=1;
                else
                        $msg=0;
                return $msg;

        }
}

?>
