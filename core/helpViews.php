<?php
class helpViews {
  public function url($controller=DEFAULT_DRIVER, $action=DEFAULT_ACTION) {
    $urlString ="index.php?
                controller=".$controller."&action=".$action;
    return $urlString;
  }

  //TODO: Helpers para las vistas.
}
?>