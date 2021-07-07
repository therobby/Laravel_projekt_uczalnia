import React, { Component } from "react";
import ReactDOM from "react-dom";

class Cart extends Component {
    constructor(props) {
        super(props);
        this.state = { display: false, cart: [] };
        this.displayOn = this.displayOn.bind(this);
        this.displayOff = this.displayOff.bind(this);
        this.cartSize = this.cartSize.bind(this);
        this.addToCart = this.addToCart.bind(this);
        this.removeFromCart = this.removeFromCart.bind(this);
        this.generateList = this.generateList.bind(this);
        this.suma = this.suma.bind(this);
    };

    displayOn() {
        this.setState({ display: true, cart: this.state.cart });
        // forceUpdate();
    };

    displayOff() {
        this.setState({ display: false, cart: this.state.cart });
        $("#cart-size").html(window.cart.cartSize());
        // forceUpdate();
    };

    cartSize() {
        let count = 0;
        this.state.cart.forEach(el=>{
            console.log({"Product": el, "Count": count});
            count += el.count;
        })
        console.log({"cart":this.state.cart, "count": count});
        return count;
    };

    addToCart(item) {
        // console.log({"add cart": this.state.cart});

        let itemID = undefined;

        if(this.state.cart.length > 0){
            itemID = this.state.cart.findIndex(el=>{ console.log({"LOOP": el, "S": item, "SAME": el.id == item.id});return el.id == item.id});
            console.log({"FIND":itemID});
        }

        if(itemID != undefined && itemID >= 0){
            
            let cart = this.state.cart;
            let citem = cart[itemID];
            citem.count++;
            cart[itemID] = citem;
            this.setState({ display: this.state.display, cart: cart });
        }
        else {
            item.count = 1;
            this.state.cart.push(item);
        }
    };

    removeFromCart(id) {
        let oldCart = this.state.cart;
        let product = oldCart.findIndex(x => x.id == id);
        if(this.state.cart[product].count > 1){
            this.state.cart[product].count--;
            this.setState({ display: this.state.display, cart: this.state.cart });
        } else {
            oldCart.splice(product,1);
            this.setState({ display: this.state.display, cart: oldCart });
        }
    };

    suma(){
        let sum = 0;
        this.state.cart.forEach(el=>{
            sum += el.price * el.count;
        })
        return sum.toFixed(2);
    }

    generateList() {
        let cart = this.state.cart;
        if (cart.length > 0 && cart[0] !== "") {
            // console.log({cart});
            let i = 0;

            return (
                <form method="post" action="/checkout">
                    <input type="hidden" name="_token" value={$('meta[name="csrf-token"]').attr('content')}></input>
                    {cart.map(el => {
                        return (
                            <div className="justify-content-center flex-row p4-lr" key={i++}>
                                <input type="hidden" value={el.id} name={"id_"+i}></input>
                                <input type="hidden" value={el.count} name={"id_"+i+"_count"}></input>
                                <small className="p4-lr flex-center">
                                    {el.price}
                                </small>
                                <h6 className="p4-lr flex-center mb0">
                                    {el.name} zł
                                </h6>
                                ({el.count})
                                <input type="button" className="btn btn-danger" onClick={() => this.removeFromCart(el.id)} value="-" ></input>
                                <input type="button" className="btn btn-success" onClick={() => {this.addToCart(el); this.forceUpdate();}} value="+" ></input>
                            </div>
                        );
                    })}
                    <div className="justify-content-center flex-row p4-lr" key={i + 1} >
                        <h6 className="p4-lr flex-center mb0">
                            Suma: {this.suma()} zł
                        </h6>
                        <input type="submit" className="btn btn-danger" value="Płacę" onClick={this.submit}></input>
                    </div>
                </form>
            );
        } else {
            return (
                <h1 className="justify-content-center flex-row">Pusto :(</h1>
            );
        }
    }

    render() {
        if (this.state.display) {
            let list = this.generateList();

            return (
                <div className="modal justify-content-center">
                    <div className="row justify-content-center flex-row col-lg">
                        <div className="blured"></div>
                        <div className="blured"></div>
                        <div className="col-lg">
                            <div className="card">
                                <button
                                    className="btn btn-danger"
                                    onClick={this.displayOff}
                                >
                                    Zamknij
                                </button>
                                {list}
                            </div>
                        </div>
                    </div>
                </div>
            );
        } else {
            return null;
        }
    }
}

export default Cart;

if (document.getElementById("shopping-cart")) {
    ReactDOM.render(
        <Cart
            ref={cart => {
                window.cart = cart;
            }}
        />,
        document.getElementById("shopping-cart")
    );
}
