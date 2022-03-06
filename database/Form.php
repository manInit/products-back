<?php 

require_once 'DB.php';

class Form
{
    private DB $db;

    public function __construct() 
    {
        $this->db = new DB();
    }

    public function saveFormData($data)
    {
        $errors = $this->validateData($data);
        if (count($errors) != 0) {
            return $errors;
        }

        return $this->db->queryRows("
            INSERT INTO Form (name, email, birth_year, gender, subject, text, agree)
            VALUES (:username, :email, :birthYear, :gender, :subject, :text, :agree)",
            $data
        );
    }

    private function validateData($data)
    {
        $errors = [];
        //проверка имени
        preg_match('/^[a-zA-Zа-яА-Я]{2,}$/', $data['username'], $matchesName);
        if (count($matchesName) == 0) {
            $errors['username'] = 'Имя должно состоять только из букв и быть не менее 2-х символов';
        }
        //проверка почты
        preg_match('/^\S+@[a-z]+\.[a-z]{2,}$/', $data['email'], $matchesEmail);
        if (count($matchesName) == 0) {
            $errors['email'] = 'Неверно введен e-mail';
        }
        //проверка темы
        if (mb_strlen($data['subject']) <= 3) {
            $errors['subject'] = 'Тема должна быть более 3-х символов';
        }
        //проверка "суть вопроса"
        if (mb_strlen($data['text']) <= 10) {
            $errors['text'] = 'Вопрос должен быть более 10-ти символов';
        }

        if (!$data['agree']) {
            $errors['agree'] = 'Обязательно для заполнения';
        }

        return $errors;
    }
}