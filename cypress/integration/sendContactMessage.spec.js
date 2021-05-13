describe("Send contact message", () => {
  before(() => {
    cy.visit("/contactHelp.php");
  });

  beforeEach(() => {
    Cypress.Cookies.preserveOnce("PHPSESSID");
  });

  it("Sends contact message with error", () => {
    cy.get("input[name=subject]")
      .clear({ force: true })
      .type("Problem z logowaniem");
    cy.get("input[name=name]").clear({ force: true }).type("31232131313");
    cy.get("input[name=surname]").clear({ force: true }).type("kowalski");
    cy.get("input[name=email]")
      .clear({ force: true })
      .type("teodor.tkaczyk@98gmail.com");
    cy.get("textarea[name=problemDesc]")
      .clear({ force: true })
      .type("Problem z logowaniem heeeelp");
    cy.get('[data-test-id="sendMessage"]').click({ force: true });
    cy.get('[data-test-id="messageStatusError"]').should("be.visible");
  });

  it("Sends contact message with success", () => {
    cy.get("input[name=subject]")
      .clear({ force: true })
      .type("Problem z logowaniem");
    cy.get("input[name=name]").clear({ force: true }).type("janek");
    cy.get("input[name=surname]").clear({ force: true }).type("kowalski");
    cy.get("input[name=email]")
      .clear({ force: true })
      .type("teodor.tkaczyk98@gmail.com");
    cy.get("textarea[name=problemDesc]")
      .clear({ force: true })
      .type("Problem z logowaniem heeeelp");
    cy.get('[data-test-id="sendMessage"]').click({ force: true });
    cy.get('[data-test-id="messageStatusSuccess"]').should("be.visible");
  });
});
