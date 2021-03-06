<?php

class Register extends BasicPage {

    private $defaults = [
        'email' => 'Email',
        'password' => 'Password',
        'password_two' => 'Repeat Password'
    ];

    private $values = array();

    private function verify() {
        $errors = array();

        $required = ['email', 'password', 'password_two'];

        foreach ($required as $field) {
            if (!isset($_POST[$field]) || strlen($_POST[$field]) == 0)
                $errors[] = $this->defaults[$field] . ' is required!';
            else
                $this->values[$field] = $_POST[$field];
        }

        if(count($errors) == 0) {
            if($_POST['password'] != $_POST['password_two'])
                $errors[] = 'Passwords do not match!';
            else if(strlen($_POST['password']) < 6)
                $errors[] = 'Password length must be greater than 6!';
        }

        return $errors;
    }


    public function render() {
        $this->setTitle('Register');

        $errors = array();
        $success = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->verify();

            if(count($errors) == 0) {
                if(isset($_POST['account_type']) && !strcmp($_POST['account_type'], 'Student')) {
                    $result = User::insertStudent($_POST);
                } else {
                    $result = User::insertInstructor($_POST);
                }
                if(is_int($result) && $result != 0)
                    $success = "Successfully registered!";
                else if(is_int($result) && $result == 0)
                    $errors[] = "An Error Occurred!";
                else {
                    if(strstr($result, '23000') && strstr($result, 'email'))
                        $errors[] = 'User with this email already exists!';
                    else {
                        $this->values = array();
                        $success = "Successfully registered!";
                    }
                }
            }
        }

        Renderer::render('register.php', [
            'errors' => $errors,
            'defaults' => $this->defaults,
            'values' => $this->values,
            'success' => $success
        ]);
    }
}
