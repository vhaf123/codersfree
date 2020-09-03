<?php

    function setOpen($routeName){
        if(request()->routeIs($routeName)){
            return 'menu-open';
        }else{
            return '';
        }
    }

    function setOpen2($routeName1, $routeName2){
        if(request()->routeIs($routeName1) || request()->routeIs($routeName2)){
            return 'menu-open';
        }else{
            return '';
        }
    }

    function setActive($routeName){
        if(request()->routeIs($routeName)){
            return 'active';
        }else{
            return '';
        }
    }

    function setActive2($routeName1, $routeName2){
        if(request()->routeIs($routeName1) || request()->routeIs($routeName2)){
            return 'active';
        }else{
            return '';
        }
    }