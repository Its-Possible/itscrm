/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header.blade.php based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
import Notification from './notifications';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    enabledTransports: ['ws', 'wss'],
});

window.Echo.channel('app-notification')
     // Notifications about import campaigns to database
    .listen(`.campaign-import-started.app-notification`, (e) => {
        const new_notifications_alert = document.getElementById('new-notifications-alert');
        new_notifications_alert.style.display = "block";
        Notification.Add(e);
    })
    // Notifications about import customers to database
    .listen('.customer-import-started.app-notification', (e) => {
        const new_notifications_alert = document.getElementById('new-notifications-alert');
        new_notifications_alert.style.display = "block";
        Notification.Add(e);
    });




