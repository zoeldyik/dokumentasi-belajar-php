using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Crud
{
    #region Alamat
    public class Alamat
    {
        #region Member Variables
        protected int _id;
        protected string _nama;
        protected string _kota;
        #endregion
        #region Constructors
        public Alamat() { }
        public Alamat(string nama, string kota)
        {
            this._nama=nama;
            this._kota=kota;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Nama
        {
            get {return _nama;}
            set {_nama=value;}
        }
        public virtual string Kota
        {
            get {return _kota;}
            set {_kota=value;}
        }
        #endregion
    }
    #endregion
}