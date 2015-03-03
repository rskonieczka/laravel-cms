<?php

class Basemodel extends Eloquent
{

    public function scopeModelJoin($query, $relation_name, $operator = '=', $type = 'left', $where = false) {
        $relation = $this->$relation_name();
        $table = $relation->getRelated()->getTable();
        $one = $relation->getQualifiedParentKeyName();
        $two = $relation->getForeignKey();

        if (empty($query->columns)) {
            $query->select($this->getTable().".*");
        }

        //$join_alias = $table;
        $prefix = $query->getQuery()->getGrammar()->getTablePrefix();
        $join_alias = $relation_name;
        foreach (\Schema::getColumnListing($table) as $related_column) {
            $query->addSelect(\DB::raw("`$prefix$join_alias`.`$related_column` AS `$join_alias.$related_column`"));
        }
        $two = str_replace($table . ".", $join_alias . ".", $two);
        return $query->join("$table AS $prefix$relation_name", $one, $operator, $two, $type, $where); //->with($relation_name);
    }
}
