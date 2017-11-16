(function(window) {
    "use strict";
    window.addEventListener("load", function() {
        prepareMenuButton();
        styleLogin();
        setTheme();
        styleLang();
    }, false);
    function styleLogin() {
        if (document.getElementById("username")) {
            document.getElementsByTagName("form")[0].className += " login-form";
        }
    }
    function styleLang() {
        var lang = document.getElementById("lang");
        var theme = document.getElementById("theme");
        var logout = document.getElementById("logout");
        if (logout) {
            lang.style.width = lang.offsetWidth + theme.offsetWidth + logout.offsetWidth + 40 + "px";
            theme.style.right = logout.offsetWidth + 40 + "px";
        } else {
            lang.style.width = lang.offsetWidth + theme.offsetWidth + 20 + "px";
            theme.style.right = 20 + "px";
        }
    }
    function setTheme() {
        var l = document.getElementById("lang");
        var f = document.createElement("form");
        f.setAttribute("id", "theme");
        l.parentNode.parentNode.appendChild(f);
        var s = document.createElement("select");
        s.setAttribute("name", "theme");
        s.setAttribute("onchange", "this.form.submit()");
        s.innerHTML = '<option value="light"' + activeTheme("light") + ">Light</option>" + '<option value="dark"' + activeTheme("dark") + ">Dark</option>";
        document.getElementById("theme").appendChild(s);
    }
    function activeTheme(theme) {
        if (readCookie("adminer_theme") === theme) {
            return " selected";
        }
        return "";
    }
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(";");
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == " ") {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(nameEQ) == 0) {
                return c.substring(nameEQ.length, c.length);
            }
        }
        return null;
    }
    function prepareMenuButton() {
        var menu = document.getElementById("menu");
        var breadcrumb = document.getElementById("breadcrumb");
        var content = document.getElementById("content");
        var button = menu.getElementsByTagName("h1")[0];
        if (!menu || !button) {
            return;
        }
        function setBreadcrumbLeft(size) {
            if (breadcrumb) {
                breadcrumb.style.left = size + "px";
            }
        }
        function setPagesLeft(px) {
            var pages = document.getElementsByClassName("pages")[0];
            if (pages) {
                pages.style.left = px + "px";
            }
        }
        if (localStorage.getItem("adminerMenuStatus") !== "closed") {
            menu.className += " open";
        } else {
            setBreadcrumbLeft(30);
            content.style.marginLeft = 0;
        }
        function setMenu() {
            if (menu.className.indexOf(" open") >= 0) {
                menu.className = menu.className.replace(/ *open/, "");
                localStorage.setItem("adminerMenuStatus", "closed");
                setBreadcrumbLeft(30);
                content.style.marginLeft = 0;
                setPagesLeft(0);
            } else {
                menu.className += " open";
                localStorage.setItem("adminerMenuStatus", "open");
                setBreadcrumbLeft(261);
                content.style.marginLeft = "261px";
                setPagesLeft(261);
                setScrollers();
            }
            //menu.style.minHeight = window.innerHeight + "px";
        }
        if (menu.className.indexOf(" open") >= 0) {
            setPagesLeft(261);
        }
        button.addEventListener("click", function() {
            setMenu();
        }, false);
        var sensor = document.createElement("div");
        sensor.setAttribute("id", "sensor");
        sensor.style.minHeight = window.innerHeight + "px";
        sensor.addEventListener("mouseover", function() {
            setMenu();
        });
        document.body.insertBefore(sensor, content);

        function setScrollers() {
           var tables = document.getElementById("tables");       
            var login = document.getElementById("login");
            if (tables) {
                tables.style.height =  (window.innerHeight - tables.offsetTop - 12) + 'px';
            }     
            if (login) {
                login.style.height =  (window.innerHeight - login.offsetTop - 12) + 'px';
            } 
        }
        setScrollers();

          
        
    }
})(window);