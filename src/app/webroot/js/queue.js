document.queue = [];
window.publish = function () {
    document.queue.push(arguments);
}
