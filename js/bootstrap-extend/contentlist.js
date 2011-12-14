/* ============================================================
 * contentlist.js v0.1.0
 * Modification of Twitter Bootstrap's dropdown plugin
 * To toogle open/closed in the contentlist
 * ============================================================
 * Example:
 * 
 *  <ul class="contentlist" data-contentlist="contentlist">
 *	<li>
 *	    <a href="#" class="contentlist-toogle">One</a>
 *	    <div>
 *		<p>One's content</p>
 *	    </div>
 *	</li>
 *	<li>
 *	    <a href="#" class="contentlist-toogle">Two</a>
 *	    <div>
 *		<p>Two's content</p>
 *	    </div>
 *	</li>
 *	<li class="open">
 *	    <a href="#" class="contentlist-toogle">Three</a>
 *	    <div>
 *		<p>Three's content</p>
 *	    </div>
 *	</li>
 *  </ul>
 * 
 * ============================================================ */

!function( $ ){

    "use strict"

    /* CONTENTLIST PLUGIN DEFINITION
    * ========================== */

    $.fn.contentlist = function ( selector ) {
	return this.each(function () {
	    $(this).delegate(selector || d, 'click', function () {
		var li = $(this).parent('li')
		li.toggleClass('open')
		return false
	    })
	})
    }

    /* APPLY TO STANDARD CONTENTLIST ELEMENTS
    * =================================== */

    var d = '.contentlist-toogle'

    $(function () {
	$('body').contentlist( '[data-contentlist] .contentlist-toogle' )
    })

}( jQuery );
