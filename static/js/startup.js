pimcore.registerNS("pimcore.plugin.pimcoreobjectdefaults");

pimcore.plugin.pimcoreobjectdefaults = Class.create(pimcore.plugin.admin, {
    getClassName: function() {
        return "pimcore.plugin.pimcoreobjectdefaults";
    },

    initialize: function() {
        pimcore.plugin.broker.registerPlugin(this);
    },
 
    pimcoreReady: function (params,broker){
        // alert("PimcoreObjectDefaults Plugin Ready!");
    }
});

var pimcoreobjectdefaultsPlugin = new pimcore.plugin.pimcoreobjectdefaults();

