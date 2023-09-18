  <style>
      /* Styling for the dropdown button */
      .cat-dropdown-button {
          padding: 10px;
          cursor: pointer;
          color: #777;
          font-family: "Open Sans";
          font-weight: 600;
          text-transform: uppercase;
          font-size: 13px;
      }

      /* Styling for the dropdown menu */
      .cat-dropdown-menu {
          display: none;
          position: absolute;
          top: 100%;
          z-index: 999999;
          left: 0;
          background-color: #ffffff;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          width: 230px;
      }

      .cat-dropdown-button:hover + .cat-dropdown-menu,
      .cat-dropdown-menu:hover {
          display: block;
      }

      /* Style the categories */
      .cat-categories {
          padding: 10px;
          border-bottom: 1px solid #ccc;
          width: 230px;
      }
      /* Style the subcategories */
      .cat-subcategory {
          padding: 10px;
      }

      /* Styling for subcategory menu */
      .cat-subcategory-menu {
          display: none;
          top: 0;
          position: absolute;
          left: 100%;
          background-color: #f0f4fa;
          width: 432px;
          padding: 10px 30px;
          height: 100%;
      }

      .cat-category:hover .cat-subcategory-menu {
          display: flex;
          flex-wrap: wrap;
          justify-content: flex-start;
          align-content: flex-start;
      }
      .cat-category:hover .cat-dropdown-menu {
          position: relative;
      }
      .cat-category:hover ..cat-subcategory-menu {
          display: initial;
      }
      .cat-dropdown {
          position: relative;
      }
      .cat-subcategory{
          flex-basis: calc(50% - 10px);
          max-width: calc(50% - 10px);
          box-sizing: border-box;
      }
      .cat-category {
          font-family: "Open Sans";
          display: block;
          padding: 9px 15px;
          text-transform: uppercase;
          font-size: 13px;
          color: #273044;
      }
      .cat-dropdown .fa-bars{
          margin-right: 5px;
      }

  </style>
  <div class="cat-dropdown">
      <div class="cat-dropdown-button"><i class="fa fa-bars" aria-hidden="true"></i>Categories</div>
      <div class="cat-dropdown-menu">
          <div class="cat-category">Business
              <div class="cat-subcategory-menu">
                  <div class="cat-subcategory"> Communications </div>
                  <div class="cat-subcategory"> Subcategory 1.2</div>
                  <div class="cat-subcategory"> Subcategory 1.3</div>
              </div>
          </div>
          <div class="cat-category">Design
              <div class="cat-subcategory-menu">
                  <div class="cat-subcategory">Subcategory 2.1</div>
                  <div class="cat-subcategory">Subcategory 2.2</div>
              </div>
          </div>
          <div class="cat-category">Development
              <div class="cat-subcategory-menu">
                  <div class="cat-subcategory">Subcategory 3.1</div>
                  <div class="cat-subcategory">Subcategory 3.2</div>
                  <div class="cat-subcategory">Subcategory 3.3</div>
              </div>
          </div>
          <div class="cat-category">Lifetime
              <div class="cat-subcategory-menu">
                  <div class="cat-subcategory">Subcategory 3.1</div>
                  <div class="cat-subcategory">Subcategory 3.2</div>
                  <div class="cat-subcategory">Subcategory 3.3</div>
              </div>
          </div>
          <div class="cat-category">Marketing
              <div class="cat-subcategory-menu">
                  <div class="cat-subcategory">Subcategory 3.1</div>
                  <div class="cat-subcategory">Subcategory 3.2</div>
                  <div class="cat-subcategory">Subcategory 3.3</div>
              </div>
          </div>
          <div class="cat-category">Music
              <div class="cat-subcategory-menu">
                  <div class="cat-subcategory">Subcategory 3.1</div>
                  <div class="cat-subcategory">Subcategory 3.2</div>
                  <div class="cat-subcategory">Subcategory 3.3</div>
              </div>
          </div>
          <div class="cat-category">Photography
              <div class="cat-subcategory-menu">
                  <div class="cat-subcategory">Subcategory 3.1</div>
                  <div class="cat-subcategory">Subcategory 3.2</div>
                  <div class="cat-subcategory">Subcategory 3.3</div>
              </div>
          </div>
          <div class="cat-category">IT
              <div class="cat-subcategory-menu">
                  <div class="cat-subcategory">Subcategory 3.1</div>
                  <div class="cat-subcategory">Subcategory 3.2</div>
                  <div class="cat-subcategory">Subcategory 3.3</div>
              </div>
          </div>

      </div>
  </div>
