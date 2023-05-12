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
     * @param {array|null} user_id
     * @param {Object} data
     * @description - This function is used to send data to the websocket, specifying the event type and the data to send
     * @example  - new Socket().send_data('imminent_death', {nuclear_alert:"Run for your life"},['passenger'],[3,4,5,6])
     */
    send_data(event_type, data, role=null, user_id = null) {
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
     * @param {string|null} role
     * @param {int|null} user_id
     * @param {function} callback
     * @description - This function is used to receive data from the websocket and call the callback function on the data
     * @example  - new Socket().receive_data('imminent_death',func,passenger,3);
     */
    receive_data(event_type, callback, role=null, user_id = null) {
        let socket = new WebSocket(this.url);
        socket.onmessage = function (event) {
            let message = JSON.parse(event.data);
            if (message.event_type === event_type) {
                if(message.role==null || message.role.includes(role)){
                    if(message.user_id==null || message.user_id.includes(user_id)){
                        callback(message.data);
                    }
                }
            }
        }
    }
}
