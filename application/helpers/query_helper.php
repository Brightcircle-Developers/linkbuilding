<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * db_get_vars()
 *
 * Returns multiple variables from the database
 *
 * @param   string      $table_name
 * @param   array       $requested_vars
 * @param   array       $where_clauses
 * @param   int         $limit
 * @return  bool
 */

if(!function_exists('db_get_vars')) {

    function db_get_vars(string $table_name, array $requested_vars, array $where_clauses = array(), $limit = NULL) {
        $ci = get_instance();

        $prep_vars = array();

        $sql = "SELECT ";
        if(empty($requested_vars)) {
            return;
        }
        if(!empty($requested_vars)) {
            foreach($requested_vars as $var) {
                if($var !== end($requested_vars)) {
                    $sql .= "$var, ";
                    continue;
                }
                $sql.="$var";
            }
        }
        $sql .= " FROM $table_name";

        if(!empty($where_clauses)) {
            $sql .= " WHERE ";
            foreach($where_clauses as $col => $var) {
                $prep_vars[] = $var;
                if($var !== end($where_clauses)) {
                    $sql .= "$col = ? AND ";
                    continue;
                }
                $sql .= "$col = ?";
            }
        }
        if($limit !== NULL) {
            $sql .= " LIMIT ".$limit;
        }

        $query = $ci->db->conn_id->prepare($sql);
        $query->execute($prep_vars);
        $results = $query->fetchAll();
        return $results;
    }
}

/**
 * db_get_var()
 *
 * Returns one variable from the database
 *
 * @param   string      $table_name
 * @param   string      $requested_var
 * @param   array       $where_clauses
 * @param   int         $limit
 * @return  bool
 */

if(!function_exists('db_get_var')) {

    function db_get_var(string $table_name, string $requested_var, array $where_clauses = array(), int $limit = NULL) {
        $ci = get_instance();

        $prep_vars = array();

        $sql = "SELECT $requested_var FROM $table_name";

        if(!empty($where_clauses)) {
            $sql .= " WHERE ";
            foreach($where_clauses as $col => $var) {
                $prep_vars[] = $var;
                if($var !== end($where_clauses)) {
                    $sql .= "$col = ? AND ";
                    continue;
                }
                $sql .= "$col = ?";
            }
        }
        if($limit !== NULL) {
            $sql .= " LIMIT ".$limit;
        }

        $query = $ci->db->conn_id->prepare($sql);
        $query->execute($prep_vars);
        $result = $query->fetch()[0];
        return $result;
    }
}

/**
 * db_get_row()
 *
 * Returns one row from the database
 *
 * @param   string      $table_name
 * @param   array       $where_clauses
 * @return  bool
 */

if(!function_exists('db_get_row')) {

    function db_get_row(string $table_name, array $where_clauses) {
        $ci = get_instance();

        $prep_vars = array();
        $sql = "SELECT * FROM $table_name";

        if(!empty($where_clauses)) {
            $sql .= " WHERE ";
            foreach($where_clauses as $col => $var) {
                $prep_vars[] = $var;
                if($var !== end($where_clauses)) {
                    $sql .= "$col = ? AND ";
                    continue;
                }
                $sql .= "$col = ?";
            }
        }

        $query = $ci->db->conn_id->prepare($sql);
        $query->execute($prep_vars);
        $results = $query->fetch();
        return $results;
    }
}

/**
 * db_get_row()
 *
 * Returns one row from the database
 *
 * @param   string      $table_name
 * @param   array       $where_clauses
 * @return  bool
 */

if(!function_exists('db_get_rows')) {

    function db_get_rows(string $table_name, array $where_clauses, int $limit = NULL, string $like = NULL) {
        $ci = get_instance();

        $prep_vars = array();
        $sql = "SELECT * FROM $table_name";

        if(!empty($where_clauses)) {
            $sql .= " WHERE ";
            foreach($where_clauses as $col => $var) {
                $prep_vars[] = $var;
                if($var !== end($where_clauses)) {
                    $sql .= "$col = ? AND ";
                    continue;
                }
                $sql .= "$col = ?";
            }
        }
        if($limit !== NULL) {
            $sql .= " LIMIT ".$limit;
        }

        $query = $ci->db->conn_id->prepare($sql);
        $query->execute($prep_vars);
        $results = $query->fetchAll();
        return $results;
    }
}

/**
 * db_insert()
 *
 * Returns multiple variables from the database
 *
 * @param   string      $table_name
 * @param   array       $insert_values
 * @return  bool
 */

if(!function_exists('db_insert')) {

    function db_insert(string $table_name, array $insert_values) {
        $ci = get_instance();

        $prep_vars = array();
        if(empty($insert_values)) {
            return;
        }
        if(!empty($insert_values)) {
            $sql = "INSERT INTO $table_name SET ";
            foreach($insert_values as $col => $val) {
                $prep_vars[] = $val;
                $keys = array_keys($insert_values);
                $first_val = array_pop($keys);
                if($col !== $first_val) {
                    $sql .= "$col = ?, ";
                    continue;
                }
                $sql .= "$col = ?";
            }


            $query = $ci->db->conn_id->prepare($sql);
            $query->execute($prep_vars);
        }
    }

    /**
     * db_query()
     *
     * Returns one variable from the database
     *
     * @param   string      $sql
     * @param   array       $prepared_st
     * @param   int         $limit
     * @return  bool
     */

    if(!function_exists('db_query')) {

        function db_query(string $sql, array $prep_vars = array()) {
            $ci = get_instance();

            $query = $ci->db->conn_id->prepare($sql);
            $query->execute($prep_vars);
            $result = $query->fetchAll();
            return $result;
        }
    }
}
