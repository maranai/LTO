var proxy = $({});
window.publish = function () {
    proxy.trigger.apply(proxy, arguments);
};

window.unsubscribe = function () {
    proxy.off.apply(proxy, arguments);
};
window.subscribe = function () {
    proxy.on.apply(proxy, arguments);

    $(document.queue).each(function (index) {
            // console.log(index);
        // if (this[0]===event) {
            proxy.trigger.apply(proxy, this);
            document.queue.splice(index, 1);
            return false;
        // }
    });
};