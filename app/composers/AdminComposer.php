<?php

class AdminComposer {

    public function compose($view)
    {
        // Build admin menu
        $sidebarMenu = array();
        $modules = \Module::getOrdered();
        foreach($modules as $module){
            if($module->active === 1 && is_array($module->menu)){
                foreach($module->menu as $group => $menu) {
                    if(isset($sidebarMenu[$group])){
                        $sidebarMenu[$group] = $menu + $sidebarMenu[$group];
                    }else{
                        $sidebarMenu[$group] = $menu;
                    }
                }
            }
        }
        if(isset($sidebarMenu))
            $view->with('sidebarMenu', $sidebarMenu);

		$user = Sentry::getUser();
		if(isset($user))
			$view->with('activeUser', $user);

    }

}