
(function(){tinymce.PluginManager.requireLangPack('insertaudio');tinymce.create('tinymce.plugins.InsertAudioPlugin',{init:function(ed,url){ed.addCommand('mceInsertAudio',function(){ed.windowManager.open({file:url+'/dialog.htm',width:500,height:120,inline:1},{plugin_url:url});});ed.addButton('insertaudio',{title:'insertaudio.desc',cmd:'mceInsertAudio',image:url+'/img/insertaudio.gif'});},getInfo:function(){return{longname:'Insert Audio',author:'LifeType Team',authorurl:'http://www.lifetype.net',infourl:'http://www.lifetype.net',version:tinymce.majorVersion+"."+tinymce.minorVersion};}});tinymce.PluginManager.add('insertaudio',tinymce.plugins.InsertAudioPlugin);})();