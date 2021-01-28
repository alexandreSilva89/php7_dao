<?php
    class Usuario{
        private $id_usuario;
        private $username;
        private $userpass;

        public function getIdusuario(){
            return $this->id_usuario;
        }
        public function setIdusuario($value){
            $this->id_usuario = $value;
        }

        public function getUsername(){
            return $this->username;
        }
        public function setUsername($value){
            $this->username = $value;
        }

        public function getUserpass(){
            return $this->userpass;
        }
        public function setUserpass($value){
            $this->userpass = $value;
        }

        public function loadById($id){
            $sql = new Conexao();
            $results = $sql->select("SELECT * FROM usuarios WHERE id_usuario = :ID", array(
                ":ID"=>$id
            ));

            if(count($results) > 0){
                $row = $results[0];

                $this->setIdusuario($row['id_usuario']);
                $this->setUsername($row['username']);
                $this->setUserpass($row['userpass']);
            
            }
        }

        public function __toString(){
            return json_encode(array(
                "id_usuario"=>$this->getIdusuario(),
                "username"=>$this->getUsername(),
                "userpass"=>$this->getUserpass()
            ));
        }

        public static function getList(){
            $lista = new Conexao();

            return $lista->select("SELECT * FROM usuarios ORDER BY id_usuario;");
        }

        public static function search($login){
            $procura = new Conexao();
            return $procura->select("SELECT * FROM usuarios WHERE username LIKE :SEARCH ORDER BY username", array(
                ":SEARCH"=>"%".$login."%"
            ));
        }

        public function login($login, $password){
            $sql = new Conexao();
            $results = $sql->select("SELECT * FROM usuarios WHERE username = :LOGIN AND userpass = :PASSWORD", array(
                ":LOGIN"=>$login,
                ":PASSWORD"=>$password
            ));

            if(count($results) > 0){
                $row = $results[0];

                $this->setIdusuario($row['id_usuario']);
                $this->setUsername($row['username']);
                $this->setUserpass($row['userpass']);
            
            }else{
                throw new Exception("Login e/ou senha inválidos");
            }
        }
    }
?>