// JavaScript Document
function getActivity() {
        var str='';
        var val=document.getElementById('country-list');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str += val[i].value + ','; 
            }
        }         
        var str=str.slice(0,str.length -1);
        
	$.ajax({          
        	type: "GET",
        	url: "get_act.php",
        	data:'country_id='+str,
        	success: function(data){
        		$("#dis_division").html(data);
        	}
	});
}

//get district by province

function getDis() {
        var str='';
        var val=document.getElementById('country-list');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str += val[i].value + ','; 
            }
        }         
        var str=str.slice(0,str.length -1);
        
	$.ajax({          
        	type: "GET",
        	url: "get_dis.php",
        	data:'country_id='+str,
        	success: function(data){
        		$("#pro_dis").html(data);
        	}
	});
}

// get zonal by disID

function getZonal() {
        var str='';
        var val=document.getElementById('pro_dis');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str += val[i].value + ','; 
            }
        }         
        var str=str.slice(0,str.length -1);
        
	$.ajax({          
        	type: "GET",
        	url: "get_zonal.php",
        	data:'country_id='+str,
        	success: function(data){
        		$("#dis_zon").html(data);
        	}
	});
}
// get GN in Division
function getGn() {
        var str='';
        var val=document.getElementById('dis_division');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str += val[i].value + ','; 
            }
        }         
        var str=str.slice(0,str.length -1);
        
	$.ajax({          
        	type: "GET",
        	url: "get_gn.php",
        	data:'country_id='+str,
        	success: function(data){
        		$("#gn_list").html(data);
        	}
	});
}

// get product family

function getFamily() {
        var str='';
        var val=document.getElementById('family_list');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str += val[i].value + ','; 
            }
        }         
        var str=str.slice(0,str.length -1);
        
    $.ajax({          
            type: "GET",
            url: "get_family.php",
            data:'country_id='+str,
            success: function(data){
                $("#family_list2").html(data);
            }
    });
}


function getFamily2() {
        var str='';
        var val=document.getElementById('family_list');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str += val[i].value + ','; 
            }
        }         
        var str=str.slice(0,str.length -1);
        
    $.ajax({          
            type: "GET",
            url: "get_family2.php",
            data:'country_id='+str,
            success: function(data){
                $("#family_list2").html(data);
            }
    });
}
// table design

var app = angular.module('myApp', ['ui.bootstrap']);
app.controller('myCtrl', function($scope) {
  
  $scope.people=[],
  $scope.currentPage = 1,
  $scope.numPerPage = 5,
  $scope.maxSize = 5;
  
  
  
  $scope.numPages = function () {
    return Math.ceil($scope.customers.length / $scope.numPerPage);
  };
  
  $scope.$watch('currentPage + numPerPage', function() {
    var begin = (($scope.currentPage - 1) * $scope.numPerPage)
    , end = begin + $scope.numPerPage;
    
    $scope.people = $scope.customers.slice(begin, end);
  });
  
  
});

// end of table design