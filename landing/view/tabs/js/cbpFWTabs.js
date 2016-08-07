/**
 * cbpFWTabs.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */

 function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	vars[key] = value;
	});
	return vars;
}

 function getPageData(tabName) {
 	if (tabName==undefined) {
 		// alert('no tab selected');
 		return;
 	}
 		var tabName = tabName;
 		var elem = '#' + tabName;
 		// loading
          $(elem).html('Loading..');

	    // load the data in to the wrapper
        var url = 'http://freelabel.net/users/dashboard/' + tabName + '/' ;
        $.get(url, function(data){
          $(elem).html(data);
        });
        // alert(url);
}


function getInx(currentTab){
		switch (currentTab) {
	    case 'feed':
	        currentInx = 0;
	        break;
	    case 'analytics':
	        currentInx = 1;
	        break;
	    case 'promos':
	        currentInx = 2;
	        break;
	    case 'audio':
	        currentInx = 3;
	        break;
	    case 'account':
	        currentInx = 4;
	        break;
	    default:
	        currentInx = null;
	        break;

	}
	return currentInx;
}




	
;( function( window ) {
	var urlVars = getUrlVars();
	var currentTab = urlVars.ctrl;
	var currentInx = getInx(currentTab);
	var loadData = getPageData(currentTab);

	// console.log('current tab: '+currentTab);
	

	'use strict';

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function CBPFWTabs( el, options ) {

		this.el = el;
		this.options = extend( {}, this.options );
  		extend( this.options, options );
  		this._init();
	}

	CBPFWTabs.prototype.options = {
		start : 0
	};

	CBPFWTabs.prototype._init = function() {
		// console.log('current index: '+currentInx);

		// tabs elems
		this.tabs = [].slice.call( this.el.querySelectorAll( 'nav > ul > li' ) );
		// content items
		this.items = [].slice.call( this.el.querySelectorAll( '.content-wrap > section' ) );
		// current index
		this.current = -1;
		// show current content item
		this._show(currentInx);
		// init events
		this._initEvents();
	};

	CBPFWTabs.prototype._initEvents = function() {
		var self = this;
		this.tabs.forEach( function( tab, idx ) {
			tab.addEventListener( 'click', function( ev ) {
				ev.preventDefault();
				self._show( idx );
			} );
		} );
	};

	CBPFWTabs.prototype._show = function( idx ) {
		if( this.current >= 0 ) {
			this.tabs[ this.current ].className = this.items[ this.current ].className = '';
		}
		// change current
		this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
		this.tabs[ this.current ].className = 'tab-current';
		this.items[ this.current ].className = 'content-current';
	};

	// add to global namespace
	window.CBPFWTabs = CBPFWTabs;

})( window );






$(function(){

    // finds the tab data
    $('.tabs li').click(function(){
        var tabName = $(this).find('.dash-filter').attr('data-load');
        var stateObj = { foo: "bar" };

        // sets the history
        history.pushState(stateObj, "page 2", '?ctrl='+tabName);

        // Loading Please Wait Feature
        // $('#' + tabName).html('<h3 class="text-muted" style="margin:10% 10%;"><i class="fa fa-cog fa-spin"></i> Loading...</h3>');
        
        getPageData(tabName);
        // alert(tabName);
        // load the data in to the wrapper
        // var url = 'http://freelabel.net/users/dashboard/' + tabName + '/' ;
        // $.get(url, function(data){
        //   $('#' + tabName).html(data);
        // })
    });

});