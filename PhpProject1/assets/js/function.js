/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<script>
    function validatenoadminaccount() {
    alert("Administrator account not found!");
    return false;
}

function validateFormfindaccount() {
    var x = document.forms["findaccount"]["input-admin-account-username"].value;
    var y = document.forms["findaccount"]["input-action"].value;
    
    if (x == "") {
        alert("Please input username!");
        return false;
    }
    
    else if (y == "action") {
        alert("Please select an action!");
        return false;
    }
    
    
}

function adminaccountaddedsuccess() {
    alert("Administrator account successfully added!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccountaddedfailed() {
    alert("Failed to add administrator account!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccounteditsuccess() {
    alert("Administrator account successfully edited!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccounteditfailed() {
    alert("Failed to edit administrator account!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccountdeletesuccess() {
    alert("Administrator account successfully deleted!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccountdeletefailed() {
    alert("Failed to delete administrator account!");
    window.location.href = "manage-adminaccount.php";
    return false;
}

function adminaccountexist() {
    alert("Administrator account already exist!");
    window.location.href = "manage-adminaccount.php";
    return false;
}



function validateForminputaccountedit() {
    var x = document.forms["inputaccount"]["input-admin-account-username-edit"].value;
    var y = document.forms["inputaccount"]["input-admin-account-password-edit"].value;
    var z = document.forms["inputaccount"]["input-admin-account-name-edit"].value;
    
    if (x == "") {
        alert("Please input username!");
        return false;
    }
    
    else if (y == "") {
        if (confirm('The password field is empty. If you keep this empty, your password won`t be changed. Are you sure to continue?')) {
    return;  
        } else {
    return false;
        }
    }
    else if (z == "") {
        alert("Please input name!");
        return false;
    }
    
}

function validateForminputaccountadd() {
    var x = document.forms["inputaccount"]["input-admin-account-username-edit"].value;
    var y = document.forms["inputaccount"]["input-admin-account-password-edit"].value;
    var z = document.forms["inputaccount"]["input-admin-account-name-edit"].value;
    
    if (x == "") {
        alert("Please input username!");
        return false;
    }
    
    else if (y == "") {
        alert("Please input password!");
        return false;
    }
    else if (z == "") {
        alert("Please input name!");
        return false;
    }
    
}



function validateForminputaccountdelete() {
    if (confirm('Are you sure want to delete this administrator account?')) {
    return;  
        } else {
    return false;
        }
    }


</script>
<script>jQuery(document).ready(function(e) {
  function t(t) {
    e(t).bind("click", function(t) {
      t.preventDefault();
      e(this)
        .parent()
        .fadeOut();
    });
  }
  e(".dropdown-toggle").click(function() {
    var t = e(this)
    .parents(".button-dropdown")
    .children(".dropdown-menu")
    .is(":hidden");
    e(".button-dropdown .dropdown-menu").hide();
    e(".button-dropdown .dropdown-toggle").removeClass("active");
    if (t) {
      e(this)
        .parents(".button-dropdown")
        .children(".dropdown-menu")
        .toggle()
        .parents(".button-dropdown")
        .children(".dropdown-toggle")
        .addClass("active");
    }
  });
  e(document).bind("click", function(t) {
    var n = e(t.target);
    if (!n.parents().hasClass("button-dropdown"))
      e(".button-dropdown .dropdown-menu").hide();
  });
  e(document).bind("click", function(t) {
    var n = e(t.target);
    if (!n.parents().hasClass("button-dropdown"))
      e(".button-dropdown .dropdown-toggle").removeClass("active");
  });
});
</script>

