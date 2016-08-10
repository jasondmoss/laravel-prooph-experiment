<?php
namespace App\Core;


use Illuminate\Database\Eloquent\Model;

class ReadModel extends Model {

    public $primaryKey = 'uuid';
    public $incrementing = false;

    public static function create(array $attributes = []) {
        (new self())->throwWriteException();
    }

    public static function forceCreate(array $attributes) {
        (new self())->throwWriteException();
    }

    public static function onWriteConnection() {
        (new self())->throwWriteException();
    }

    public static function destroy($ids) {
        (new self())->throwWriteException();
    }

    public function delete() {
        $this->throwWriteException();
    }

    public function forceDelete() {
        $this->throwWriteException();
    }

    public static function saving($callback, $priority = 0) {
        (new self())->throwWriteException();
    }

    public static function saved($callback, $priority = 0) {
        (new self())->throwWriteException();
    }

    public static function updating($callback, $priority = 0) {
        (new self())->throwWriteException();
    }

    public static function updated($callback, $priority = 0) {
        (new self())->throwWriteException();
    }

    public static function creating($callback, $priority = 0) {
        (new self())->throwWriteException();
    }

    public static function created($callback, $priority = 0) {
        (new self())->throwWriteException();
    }

    public static function deleting($callback, $priority = 0) {
        (new self())->throwWriteException();
    }

    public static function deleted($callback, $priority = 0) {
        (new self())->throwWriteException();
    }

    public function update(array $attributes = [], array $options = []) {
        $this->throwWriteException();
    }

    public function push() {
        $this->throwWriteException();
    }

    public function save(array $options = []) {
        $this->throwWriteException();
    }

    public function touchOwners() {
        $this->throwWriteException();
    }

    public function touch() {
        $this->throwWriteException();
    }

    public function setCreatedAt($value) {
        $this->throwWriteException();
    }

    public function setUpdatedAt($value) {
        $this->throwWriteException();
    }

    public function setTable($table) {
        $this->throwWriteException();
    }

    public function setKeyName($key) {
        $this->throwWriteException();
    }

    private function throwWriteException() {
        throw new \Exception('Readmodel can not perform write operations');
    }

}