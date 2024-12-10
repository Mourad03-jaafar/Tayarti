package com.fsb.tp5.model.request;

public class productForm {
    private String code;
    private String nom;
    private double prix;
    private String image;

    public productForm(String code, String nom, double prix, String image) {
        this.code = code;
        this.nom = nom;
        this.prix = prix;
        this.image = image;
    }

    public productForm() {
    }

    public String getCode() {
        return this.code;
    }

    public void setCode(String code) {
        this.code = code;
    }

    public String getNom() {
        return this.nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public double getPrix() {
        return this.prix;
    }

    public void setPrix(double prix) {
        this.prix = prix;
    }

    public String getImage() {
        return this.image;
    }

    public void setImage(String image) {
        this.image = image;
    }

}
