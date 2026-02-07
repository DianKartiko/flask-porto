from extensions import db
from flask_appbuilder import Model
from sqlalchemy import Column, Integer, String, Text, BigInteger, DateTime
import datetime


class User(Model):
    __tablename__ = "user"
    id = Column(BigInteger, primary_key=True)
    username = Column(String(50), unique=True, nullable=False)
    password_hash = Column(String(255), nullable=False)

    def __repr__(self):
        return self.username


class Profile(Model):
    __tablename__ = "profile"
    id = Column(Integer, primary_key=True)
    # Bio text menggunakan Text agar bisa menampung paragraf panjang
    bio_text = Column(Text, nullable=False)
    github_url = Column(String(255), nullable=True)
    linkedin_url = Column(String(255), nullable=True)

    created_at = Column(DateTime, default=datetime.datetime.now, nullable=False)
    updated_at = Column(DateTime, default=datetime.datetime.now, nullable=False)

    def __repr__(self):
        return f"Bio {self.id}"


class Article(Model):
    __tablename__ = "article"
    id = Column(Integer, primary_key=True)
    date = Column(Da)
    category = Column(String(100), nullable=False)  # misal: Penetration Testing
    title = Column(String(255), nullable=False)
    image_filename = Column(String(255), nullable=True)  # contoh: nmap-tutorial.jpg

    # Simpan tags dalam bentuk string dipisah koma (contoh: "Nmap, Security, Network")
    tags = Column(String(255), nullable=True)

    def __repr__(self):
        return self.title
