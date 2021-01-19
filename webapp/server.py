#!/bin/env python3

from flask import Flask, render_template
import os
import glob
import collections

app = Flask(__name__, template_folder='.')

@app.route("/")
def home():
    file_list = glob.glob("static/casts/*.cast")
    links={}
    for cast_file in file_list:
        target = cast_file
        info_file = open(cast_file[:-4] + 'info', 'r')
        infos=info_file.read()
        [date,cmd] = infos.split(' : ')
        info_file.close()
        links[date]={'target' : target, 'title'  : cmd.replace("\n","")}
    od = collections.OrderedDict(sorted(links.items()))
    return render_template("default.html", title='Home', links=od)

if __name__ == "__main__":
    port = int(os.environ.get("PORT", 5000))
    app.run(debug=True,host='0.0.0.0',port=port)
