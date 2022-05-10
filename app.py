import re
from flask import Flask, render_template, request, url_for

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('menu.html')


@app.route('/client_add', methods=['POST', 'GET'])
def client_add():
    if request.method == 'GET':
        # Client-add form
        return render_template('client_add.html', client_add=client_add)
    else:
        body = request.form['firm']

        return body
        # Client added information

@app.route('/clients', methods=['POST'])
def clients():
    pass

@app.route('/order_add', methods=['POST'])
def order_add():
    pass

@app.route('/orders', methods=['POST'])
def orders(status):
    pass

@app.route('/tasks', methods=['POST'])
def tasks():
    pass