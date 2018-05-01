using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

namespace PPEMS_v1._0.DIR.PropertyCustodian.Ajax
{
    public partial class Insert_SUPPLIER : System.Web.UI.Page
    {
        SqlConnection con = new SqlConnection(Properties.Resources.con);
        string suppnameins, suppaddressins, supptinins;
        protected void Page_Load(object sender, EventArgs e)
        {
            suppnameins = Request.QueryString["suppnameins"];
            suppaddressins = Request.QueryString["suppaddressins"];
            supptinins = Request.QueryString["supptinins"];

            con.Open();
            SqlCommand cmd = con.CreateCommand();
            cmd.CommandType = CommandType.Text;
            cmd.CommandText = "INSERT INTO [PPEMS].[R_SUPPLIER] (S_NAME, S_ADDRESS, S_TIN) VALUES ('" + suppnameins + "', '" + suppaddressins + "', '" + supptinins + "') ";
            cmd.ExecuteNonQuery();

            con.Close();
        }
    }
}