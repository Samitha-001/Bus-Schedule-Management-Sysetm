/**
 * Socket class
 * @param url - the url to connect to including the port
 * @event event_type - the event type to listen to eg. CompletedOrder, NewOrder
 * @data - the data to send to the websocket
 * @callback callback - the callback function to call when the event is received
 */

class Socket {
    constructor(url = `ws://${SOCKET_HOST}:8080`) {
        this.url = url;
    }

    /**
     * @param {string} event_type
     * @param {string} role
     * @param {number|null} user_id
     * @param {Object} data
     * @description - This function is used to send data to the websocket, specifying the event type and the data to send
     */
    send_data(event_type, data, role, user_id = null) {
        let socket = new WebSocket(this.url);
        socket.onopen = function (event) {
            socket.send(JSON.stringify({
                event_type: event_type,
                role: role,
                user_id: user_id,
                data: data
            }));
        }
    }

    /**
     * @param {string} event_type
     * @param {string} role
     * @param {number|null} user_id
     * @param {function} callback
     * @description - This function is used to receive data from the websocket and call the callback function on the data
     */
    receive_data(event_type, callback, role, user_id = null) {
        let socket = new WebSocket(this.url);
        socket.onmessage = function (event) {
            let message = JSON.parse(event.data);
            if (message.event_type === event_type && message.role === role && (message.user_id === user_id || message.user_id === null)) {
                callback(message.data);
            }
        }
    }
}
