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
     * @param {array|null} role
     * @param {array|null} usernames
     * @param {Object} data
     * @description - This function is used to send data to the websocket, specifying the event type and the data to send
     * @example  - new Socket().send_data('imminent_death', {nuclear_alert:"Run for your life"},['passenger'],["venudi","sachini])
     */
    send_data(event_type, data, role=null, usernames = null) {
        let socket = new WebSocket(this.url);
        socket.onopen = function (event) {
            socket.send(JSON.stringify({
                event_type: event_type,
                role: role,
                usernames: usernames,
                data: data
            }));
        }
    }

    /**
     * @param {string} event_type
     * @param {string|null} role
     * @param {string|null} username
     * @param {function} callback
     * @description - This function is used to receive data from the websocket and call the callback function on the data
     * @example  - new Socket().receive_data('imminent_death',func,passenger,"venudi");
     */
    receive_data(event_type, callback, role=null, username = null) {
        let socket = new WebSocket(this.url);
        socket.onmessage = function (event) {
            let message = JSON.parse(event.data);
            if (message.event_type === event_type) {
                if(message.role==null || message.role.includes(role)){
                    if(message.username==null || message.username.includes(username)){
                        callback(message.data);
                    }
                }
            }
        }
    }
}
