describe("Send contact message", () => {
  before(() => {
    cy.visit("/contactHelp.php");
  });

  it("Sends contact message", () => {
    cy.get("input[name=subject]")
      .clear({ force: true })
      .type("Problem z logowaniem");
    cy.get("input[name=username]").clear({ force: true }).type("user123");
    cy.get("input[name=email]")
      .clear({ force: true })
      .type("teodor.tkaczyk98@gmail.com");
    cy.get("textarea[name=problemDesc]")
      .clear({ force: true })
      .type("Problem z logowaniem heeeelp");
    cy.get('[data-test-id="sendMessage"]').click({ force: true });
    cy.get('[data-test-id="messageStatus"]').should("be.visible");
  });
});
