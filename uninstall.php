<?php

/** @var rex_addon $this */

// Diese Datei ist keine Pflichtdatei mehr.

// Addon-Objekt bereitstellen und Data-Verzeichnis löschen (redaxo\data\addons\demo_addon\)
// Im addon-Kontext wäre auch $this->getDataPath() möglich
$addon = rex_addon::get('demo_addon');
rex_dir::delete($addon->getDataPath());

// SQL-Anweisungen können auch weiterhin über die uninstall.sql ausgeführt werden.
// Empfohlen wird aber die SQL-Anweisungen in der uninstall.php auszuführen
// Siehe auch https://redaxo.org/doku/master/datenbank-tabellen
// Die Tabelle des Demo-Addons wird hier gelöscht
rex_sql_table::get(rex::getTable('demo_addon'))->drop();

// Mit einer rex_functional_exception kann die Deistallation mit einer Fehlermeldung abgebrochen werden.
$somethingIsWrong = false;
if ($somethingIsWrong) {
    throw new rex_functional_exception('Something is wrong');
}

// Alternativ kann ähnlich wie in R4 mit den Properties "install" und "installmsg" die Deinstallation als nicht erfolgreich markiert werden.
// Im Gegensatz zu R4 muss für eine erfolgreiche Deinstallation keine Property mehr gesetzt werden.
if ($somethingIsWrong) {
    $this->setProperty('installmsg', 'Something is wrong');
    $this->setProperty('install', true);
}
