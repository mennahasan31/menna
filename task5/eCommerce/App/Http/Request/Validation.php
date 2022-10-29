<?php

namespace App\Http\Request;


class Validation
{
    private $input;
    private $inputName;
    private array $errors = [];


    public function required(){

        if(empty($this->input) ){
            $this->errors[$this->inputName][__FUNCTION__]="{$this->inputName} is required";

        }
        return $this;
    }


    public function string(){
      if(!is_string($this->input)){
         $this->errors[$this->inputName][__FUNCTION__]="{$this->inputName} must be string";

      }
     return $this;

    }

    public function between(int $min,int $max){
        if(!((strlen($this->input)>$min && strlen($this->input)))<=$max){
            $this->errors[$this->inputName][__FUNCTION__] = "{$this->inputName} must be between {$min} , {$max}";


        }
        return $this;

    }

    public function regex(string $pattern,$message=null)  :self
    {
        if(! preg_match($pattern,$this->input)){
            $this->errors[$this->inputName][__FUNCTION__] = $message ?? "{$this->inputName} invalid";
        }
        return $this;
    }


    public function setInput($input)
    {
        $this->input = $input;

        return $this;
    }


    public function setInputName($inputName)
    {
        $this->inputName = $inputName;

        return $this;
    }
    public function unique(){
return $this;

    }

    /**
     * Get the value of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
