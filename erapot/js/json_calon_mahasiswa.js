    $(document).ready(function() {
        myDatatables.dt();
    });
    
    //* calendar
    myDatatables = {
        dt: function(){
            if($('#dt').length) {
                
                var oTable;
 
                /* Formating function for row details */
                function fnFormatDetails ( nTr )
                {
                    var aData = oTable.fnGetData( nTr );
                    var sOut = '<table cellpadding="5" cellspacing="0" border="0" class="table table-bordered" >';
                    sOut += '<tr><td>informasi lainnya</td><td>'+aData[2]+' '+aData[6]+'</td></tr>';
                    sOut += '<tr><td>??:</td><td>'+aData[5]+'</td></tr>';
                    sOut += '<tr><td>Action:</td><td>Update | Delete</td></tr>';
                    sOut += '</table>';
                     
                    return sOut;
                }
                
                oTable = $('#dt').dataTable( {
                    "bProcessing": true,
                    "bServerSide": true,
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                    "sAjaxSource": "http://localhost/eadmin/calon_mahasiswa/json",
                    "aoColumns": [
                        { "sClass": "center", "bSortable": false },
                        null,
                        null,
                        null,
                        null,
                        { "sClass": "center" }
                    ],
                    "aaSorting": [[1, 'asc']]
                } );
                
                 
                $('#dt').on('click','tbody td img', function () {
                    var nTr = $(this).parents('tr')[0];
                    if ( oTable.fnIsOpen(nTr) )
                    {
                        /* This row is already open - close it */
                        this.src = "img/details_open.png";
                        oTable.fnClose( nTr );
                    }
                    else
                    {
                        /* Open this row */
                        this.src = "img/details_close.png";
                        oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
                    }
                } );

            }
        }
    };

    /* Default class modification */
    $.extend( $.fn.dataTableExt.oStdClasses, {
        "sWrapper": "dataTables_wrapper form-inline"
    });
    
    /* API method to get paging information */
    $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
    {
        return {
            "iStart":         oSettings._iDisplayStart,
            "iEnd":           oSettings.fnDisplayEnd(),
            "iLength":        oSettings._iDisplayLength,
            "iTotal":         oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
            "iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
        };
    }
    
    /* Bootstrap style pagination control */
    $.extend( $.fn.dataTableExt.oPagination, {
        "bootstrap": {
            "fnInit": function( oSettings, nPaging, fnDraw ) {
                var oLang = oSettings.oLanguage.oPaginate;
                var fnClickHandler = function ( e ) {
                    e.preventDefault();
                    if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
                        fnDraw( oSettings );
                    }
                };
    
                $(nPaging).addClass('pagination').append(
                    '<ul>'+
                        '<li class="prev disabled"><a href="#">&lt; '+oLang.sPrevious+'</a></li>'+
                        '<li class="next disabled"><a href="#">'+oLang.sNext+' &gt; </a></li>'+
                    '</ul>'
                );
                var els = $('a', nPaging);
                $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
                $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
            },
    
            "fnUpdate": function ( oSettings, fnDraw ) {
                var iListLength = 5;
                var oPaging = oSettings.oInstance.fnPagingInfo();
                var an = oSettings.aanFeatures.p;
                var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);
    
                if ( oPaging.iTotalPages < iListLength) {
                    iStart = 1;
                    iEnd = oPaging.iTotalPages;
                }
                else if ( oPaging.iPage <= iHalf ) {
                    iStart = 1;
                    iEnd = iListLength;
                } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
                    iStart = oPaging.iTotalPages - iListLength + 1;
                    iEnd = oPaging.iTotalPages;
                } else {
                    iStart = oPaging.iPage - iHalf + 1;
                    iEnd = iStart + iListLength - 1;
                }
    
                for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
                    // Remove the middle elements
                    $('li:gt(0)', an[i]).filter(':not(:last)').remove();
    
                    // Add the new list items and their event handlers
                    for ( j=iStart ; j<=iEnd ; j++ ) {
                        sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
                        $('<li '+sClass+'><a href="#">'+j+'</a></li>')
                            .insertBefore( $('li:last', an[i])[0] )
                            .bind('click', function (e) {
                                e.preventDefault();
                                oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                                fnDraw( oSettings );
                            } );
                    }
    
                    // Add / remove disabled classes from the static elements
                    if ( oPaging.iPage === 0 ) {
                        $('li:first', an[i]).addClass('disabled');
                    } else {
                        $('li:first', an[i]).removeClass('disabled');
                    }
    
                    if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                        $('li:last', an[i]).addClass('disabled');
                    } else {
                        $('li:last', an[i]).removeClass('disabled');
                    }
                }
            }
        }
    });
