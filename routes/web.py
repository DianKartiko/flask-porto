from flask import Blueprint, render_template

# --- Blueprint Initiation ---
bp = Blueprint("route", __name__)


@bp.context_processor
def inject_menu_data():
    left_menu = [
        {"label": "About", "href": "/about"},
        {"label": "Articles", "href": "/articles"},
        {"label": "Projects", "href": "/project"},
        {"label": "Get in touch", "href": "/contact"},
    ]

    return dict(left_menu=left_menu)


# --- Blurprint Route ---
@bp.route("/")
def index():
    return render_template("menu/home.html")


@bp.route("/about")
def about():
    return render_template("menu/about.html")
