if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('./sw.js', { scope: './' }).then(function(reg) {
    // registration worked
    console.log('Registration succeeded. Scope is ' + reg.scope);
    
  }).catch(function(error) {
    // registration failed
    console.log('Registration failed with ' + error);
  });
}

  self.addEventListener('install', function(event) {
    console.log('[Service Worker] Installing Service Worker ...', event);
    event.waitUntil(self.skipWaiting());
});

self.addEventListener('fetch', function(event) {
    //console.log(e.request.url);
    console.log('[Service Worker] fetch ...', event);
    event.waitUntil(self.skipWaiting());
});
