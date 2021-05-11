describe("Edit personal data", () => {
  before(() => {
    cy.visit("/signin.php");
    //cy.clearDB() - wlasna funkcja do cypress, ktora wyczysci nam baze przed zalogowaniem
    //cy.registerUser() - stworz konto, na ktore uzytkownik bedzie mogl sie zalogowac
    // login - teodor.tkaczyk98@gmail.com
    // password - haslo123
  });

  beforeEach(() => {
    Cypress.Cookies.preserveOnce("PHPSESSID");
  });

  it("Successfully logged into a service", () => {
    cy.login();
  });

  it("Wrong old password", () => {
    cy.get("input[name=oldPass]").clear({ force: true }).type("haslo123");
    cy.get("input[name=newPass]").clear({ force: true }).type("haslo1234");
    cy.get("input[name=repeatnewpass]")
      .clear({ force: true })
      .type("haslo1234");
    cy.get('[data-test-id="passwordChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataError"]').should("be.visible");
  });

  it("Correct old password", () => {
    cy.get("input[name=oldPass]").clear({ force: true }).type("haslo1234");
    cy.get("input[name=newPass]").clear({ force: true }).type("haslo1234");
    cy.get("input[name=repeatnewpass]")
      .clear({ force: true })
      .type("haslo1234");
    cy.get('[data-test-id="passwordChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataSuccess"]').should("be.visible");
  });

  it("Wrong email", () => {
    cy.get("input[name=newEmail]")
      .clear({ force: true })
      .type("teodor.tkaczyk98gmail.com");
    cy.get('[data-test-id="emailChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataError"]').should("be.visible");
  });

  it("Email exists", () => {
    cy.get("input[name=newEmail]")
      .clear({ force: true })
      .type("janek.kowalski@wp.pl");
    cy.get('[data-test-id="emailChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataError"]').should("be.visible");
  });

  it("Correct email", () => {
    cy.get("input[name=newEmail]")
      .clear({ force: true })
      .type("teodor.tkaczyk98@gmail.com");
    cy.get('[data-test-id="emailChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataSuccess"]').should("be.visible");
  });

  it("Wrong phone number", () => {
    cy.get("input[name=newPhone]").clear({ force: true }).type("asddadsadada");
    cy.get('[data-test-id="phoneChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataError"]').should("be.visible");
  });

  it("Phone number exists", () => {
    cy.get("input[name=newPhone]").clear({ force: true }).type("111222333");
    cy.get('[data-test-id="phoneChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataError"]').should("be.visible");
  });

  it("Correct phone number", () => {
    cy.get("input[name=newPhone]").clear({ force: true }).type("333222111");
    cy.get('[data-test-id="phoneChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataSuccess"]').should("be.visible");
  });

  it("Wrong name and surname", () => {
    cy.get("input[name=newName]").clear({ force: true }).type("2313");
    cy.get("input[name=newSurname]").clear({ force: true }).type("123123");
    cy.get('[data-test-id="dataChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataError"]').should("be.visible");
  });

  it("Correct name and surname", () => {
    cy.get("input[name=newName]").clear({ force: true }).type("Teodor");
    cy.get("input[name=newSurname]").clear({ force: true }).type("Tkaczyk");
    cy.get('[data-test-id="dataChange"]').click({ force: true });
    cy.get('[data-test-id="changeDataSuccess"]').should("be.visible");
  });

  it("Wrong password while deleting account", () => {
    cy.get("input[name=password]").clear({ force: true }).type("haslo111");
    cy.get('[data-test-id="deleteAccount"]').click({ force: true });
    cy.get('[data-test-id="changeDataError"]').should("be.visible");
  });
});
