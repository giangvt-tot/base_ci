<?php

class M_user extends my_model {

    public function setting_table() {
        $this->_table = 'htt_user';
        $this->_field = array('id', 'name', 'password', 'email', 'age', 'country');
        $this->_key = 'id';
        $this->_unique = array('name', 'email');
        $this->_field_search = array('name', 'email');
    }

}
