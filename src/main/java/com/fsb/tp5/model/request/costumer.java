package com.fsb.tp5.model.request;

public class costumer {
    private Long id;
    private String fullname;
    private String email;
    private String tel;



    public costumer(Long id, String fullname, String tel, String email) {
        this.id = id;
        this.fullname = fullname;
        this.email = email;
        this.tel = tel;
    }



    public Long getId() {
        return this.id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getFullname() {
        return this.fullname;
    }

    public void setFullname(String fullname) {
        this.fullname = fullname;
    }

    public String getEmail() {
        return this.email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getTel() {
        return this.tel;
    }

    public void setTel(String tel) {
        this.tel = tel;
    }
    

    
}
