 
(function() {

    tinymce.create('tinymce.plugins.wptb_tinyplugin', {

        init : function(ed, url){            
            ed.addCommand('wptb_mcedonwloadmanager', function() {
                                ed.windowManager.open({
                                        title: 'Download Controller',
                                        file : 'admin.php?wptb_action=wptb_tinymce_button',
                                        height: 300,
                                        width:400,                                        
                                        inline : 1
                                }, {
                                        plugin_url : url, // Plugin absolute URL
                                        some_custom_arg : 'custom arg' // Custom argument
                                });
                        });
            
            ed.addButton('wptb_tinyplugin', {
                title : 'Insert WP Table',
                cmd : 'wptb_mcedonwloadmanager',
                image:  url+"/images/table.gif"
            });
        },                       

        getInfo : function() {
            return {
                longname : 'WPDC - TinyMCE Button Add-on',
                author : 'Shaon',
                authorurl : 'http://www.wpdownloadmanager.com',
                infourl : 'http://www.wpdownloadmanager.com',
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add('wptb_tinyplugin', tinymce.plugins.wptb_tinyplugin);
    
})();
