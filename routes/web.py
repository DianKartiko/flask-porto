from flask import Blueprint, render_template

# --- Blueprint Initiation ---
bp = Blueprint("route", __name__)


# --- Blurprint Route ---
@bp.route("/")
def index():
    return render_template("menu/home.html")


@bp.route("/about")
def about():
    return render_template("menu/about.html")
