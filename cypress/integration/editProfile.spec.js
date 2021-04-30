describe("Edit personal data", () => {
  before(() => {
    cy.visit("/signin.php");
    cy.scrollTo(0, 0);
    //cy.clearDB() - wlasna funkcja do cypress, ktora wyczysci nam baze przed zalogowaniem
    //cy.registerUser() - stworz konto, na ktore uzytkownik bedzie mogl sie zalogowac
    // login - teodor.tkaczyk98@gmail.com
    // password - haslo123
  });

  it("Successfully logged into a service", () => {
    cy.get("input[name=email]")
      .clear({ force: true })
      .type("teodor.tkaczyk98@gmail.com");
    cy.get("input[name=password]").clear({ force: true }).type("haslo123");
    cy.get('button[type="submit"]').click({ force: true });
    cy.url().should("include", "/userprofile.php");
  });

  it("Change user password", () => {
    cy.visit("/userprofile.php");
    cy.get("input[name=oldPass]").clear({ force: true }).type("haslo123");
    cy.get("input[name=newPass]").clear({ force: true }).type("haslo1234");
    cy.get("input[name=repeatnewpass]")
      .clear({ force: true })
      .type("haslo1234");
  });
});
